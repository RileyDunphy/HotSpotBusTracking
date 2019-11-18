import React, { Component } from "react";
import {
  Platform,
  StyleSheet,
  Button,
  TextInput,
  Text,
  View,
  Picker,
  Alert,
  AsyncStorage,
  TouchableOpacity
} from "react-native";
import DialogInput from "react-native-dialog-input";
import Constants from "expo-constants";
import * as Location from "expo-location";
import * as Permissions from "expo-permissions";
import { TaskManager, Updates } from "expo";

const instructions = Platform.select({
  ios: "Press Cmd+R to reload,\n" + "Cmd+D or shake for dev menu",
  android:
    "Double tap R on your keyboard to reload,\n" +
    "Shake or press menu button for dev menu"
});

export default class App extends Component {
  state = {
    location: null,
    oldLocation: null,
    timer: setInterval(() => this.findCoordinates(), 5000),
    txtCityID: null,
    txtBusID: null,
    cityID: null,
    busID: null,
    //Josh Code
    time: null,
    routes: null,
    routelist: null,
    selectedRoute: 0,
    offline: 1,
    busIDScreen: false,
    signedIn: false
  };

  componentDidMount() {
    AsyncStorage.getItem("cityID")
      .then(value => {
        if (value !== null) {
          this.signedIn = true;
        }
      })
      .catch(error => console.error("AsyncStorage error: " + error.message))
      .done();
    this.getID();
    if (this.state.routes == null || this.state.routes == undefined) {
      this.getCityRoutes(this.state.cityID); //this method sets the routes for the city
    }
  }

  UpdateApp() {
    var today = new Date();
    var checkHour = today.getHours();
    var checkMinute = today.getMinutes();

    if (checkHour == 23 && checkMinute == 30) {
      Updates.reload();
    }
  }

  haversineFormula(lat1, lon1, lat2, lon2) {
    // generally used geo measurement function
    var R = 6378.137; // Radius of earth in KM
    var dLat = (lat2 * Math.PI) / 180 - (lat1 * Math.PI) / 180;
    var dLon = (lon2 * Math.PI) / 180 - (lon1 * Math.PI) / 180;
    var a =
      Math.sin(dLat / 2) * Math.sin(dLat / 2) +
      Math.cos((lat1 * Math.PI) / 180) *
      Math.cos((lat2 * Math.PI) / 180) *
      Math.sin(dLon / 2) *
      Math.sin(dLon / 2);
    var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1 - a));
    var d = R * c;
    return d * 1000; // meters
  }

  findCoordinates() {
    navigator.geolocation.getCurrentPosition(
      position => {
        const location = JSON.stringify(position);
        this.setState({ location });
        this.timeConvert();
        this.publishLocationData();
        this.UpdateApp();
      },
      error => Alert.alert(error.message),
      { enableHighAccuracy: true, timeout: 10000, maximumAge: 0 }
    );
  }
  //Author Josh
  timeConvert() {
    if (this.location != null) {
      var temp = JSON.parse(this.state.location); //first parse the json

      var timestamp = temp["timestamp"];
      var ts = new Date(timestamp);
      var timeFormatted =
        ts.getFullYear() +
        "-" +
        ts.getMonth() +
        "-" +
        ts.getDate() +
        " " +
        ts.getHours() +
        ":" +
        ts.getMinutes() +
        ":" +
        ts.getSeconds();
      this.state.time = timeFormatted;
    }
  }
  //author Josh
  getCityRoutes = async () => {
    var city = await AsyncStorage.getItem("cityID");
    fetch("https://next.hotspotpark.com/busTracking/getRoutesForCity", {
      method: "POST",
      headers: {
        Accept: "application/json",
        "Content-Type": "application/json"
      },
      body: JSON.stringify({ city_id: city })
    })
      .then(response => response.json())
      .then(data => {
        this.state.routes = JSON.stringify(data);
        this.setState({ routelist: data });
      })
      .catch(error => {
        console.error(error);
      });
  };

  setID = async () => {
    if (this.busIDScreen == false) {
      await AsyncStorage.setItem("cityID", this.txtCityID);
      this.cityID = await AsyncStorage.getItem("cityID");
    }
    await AsyncStorage.setItem("busID", this.txtBusID);
    this.busID = await AsyncStorage.getItem("busID");
    this.busIDScreen = false;
    this.signedIn = true;
  };

  getID = async () => {
    this.cityID = await AsyncStorage.getItem("cityID");
    this.busID = await AsyncStorage.getItem("busID");
  };

  clearStorage = async () => {
    await AsyncStorage.removeItem("cityID");
    await AsyncStorage.removeItem("busID");
    this.cityID = await AsyncStorage.getItem("cityID");
    this.busID = await AsyncStorage.getItem("busID");
    this.txtCityID = await AsyncStorage.getItem("cityID");
    this.txtBusID = await AsyncStorage.getItem("busID");
  };

  clearBusId = async () => {
    await AsyncStorage.removeItem("busID");
    this.busID = await AsyncStorage.getItem("busID");
    this.txtBusID = await AsyncStorage.getItem("busID");
    this.busIDScreen = true;
  };

  //author josh
  setRoute(routeValue, routeIndex) {
    this.state.selectedRoute = routeValue;
    if (routeValue > 0) {
      this.offline = 0;
    } else if (routeValue <= 0) {
      this.offline = 1;
    }
  }
  publishLocationData() {
    if (this.oldLocation != null) {
      var meters = this.haversineFormula(
        this.oldLocation["latitude"],
        this.oldLocation["longitude"],
        this.location["latitude"],
        this.location["longitude"]
      );
    }
    if (meters > 5 || this.oldLocation == null) {
      if (this.state.selectedRoute > 0 && this.state.location != null) {
        this.oldLocation = this.location;
        temp = JSON.parse(this.state.location);
        var coords = temp["coords"];
        var mockedVal = temp["mocked"];
        var accuracy = coords["accuracy"];
        var altitude = coords["altitude"];
        var heading = coords["heading"];
        var lat = coords["latitude"];
        var lon = coords["longitude"];
        var speed = coords["speed"];
        var timestamp = temp["timestamp"];
        var ts = new Date(timestamp);
        ts.setMonth(ts.getMonth() + 1);

        var timeFormatted =
          ts.getFullYear() +
          "-" +
          ts.getMonth() +
          "-" +
          ts.getDate() +
          " " +
          ts.getHours() +
          ":" +
          ts.getMinutes() +
          ":" +
          ts.getSeconds();
        this.state.time = timeFormatted;

        var json = JSON.stringify({
          route_id: this.state.selectedRoute,
          timestamp: timeFormatted,
          mocked: mockedVal,
          heading: heading,
          longitude: lon,
          latitude: lat,
          speed: speed,
          accuracy: accuracy,
          altitude: altitude,
          bus_id: this.busID,
          offline: this.offline
        });

        fetch(
          "https://next.hotspotpark.com/busTracking/submitBusTrackingInformation",
          {
            method: "POST",
            headers: {
              Accept: "application/json",
              "Content-Type": "application/json"
            },
            body: json
          }
        ).catch(error => {
          console.error(error);
        });
      }
    }
  }

  render() {
    let screen;
    //if the cityID is in storage, set the screen to the index
    if (this.busIDScreen == true) {
      screen = (
        <View style={styles.container}>
          <View>
            <Text style={{ color: "white" }}>Please enter Bus ID</Text>
          </View>
          <TextInput
            style={{
              height: 40,
              width: 100,
              borderColor: "white",
              borderWidth: 1,
              color: "white"
            }}
            onChangeText={text => (this.txtBusID = text)}
          />
          <Button onPress={() => this.setID()} title="Change ID" />
        </View>
      );
    } else if (this.signedIn) {
      screen = (
        <View style={styles.container}>
          <TouchableOpacity
            style={{
              position: "absolute",
              bottom: 0,
              right: 0
            }}
            onPress={this.clearBusId}
          >
            <Text
              style={{
                color: "white",
                fontSize: 20
              }}
            >
              {this.busID} - Change
            </Text>
          </TouchableOpacity>
          <Text
            style={{
              color: "white",
              fontSize: 20
            }}
          >
            Current Route
          </Text>
          <Text
            style={{
              color: "white",
              fontSize: 50,
              justifyContent: "center",
              alignItems: "center",
              textAlign: "center",
              borderBottomWidth: 80,
              padding: 20
            }}
          >
            {this.state.routelist.data[this.state.selectedRoute]}
          </Text>
          <Picker
            selectedValue={0}
            onValueChange={(itemValue, itemIndex) =>
              this.setRoute(itemValue, itemIndex)
            }
            style={{
              height: 75,
              width: 300,
              color: "black",
              backgroundColor: "lightgray",
              fontSize: 50
            }}
          >
            <Picker.Item label="Select a Route" value="0" />
            {Object.keys(this.state.routelist.data).map(key => {
              return (
                <Picker.Item
                  label={this.state.routelist.data[key]}
                  value={key}
                  key={key}
                />
              );
            })}
            <Picker.Item label="Out of Service" value="-1" />
          </Picker>
          {/*<Button onPress={() => this.clearStorage()} title="Clear Storage" />*/}
        </View>
      );
      //if the cityID is not in storage, set the screen to the login page
    } else if (!this.signedIn) {
      screen = (
        <View style={styles.container}>
          <View>
            <Text style={{ color: "white" }}>
              Please enter City ID and Bus ID
            </Text>
          </View>
          <TextInput
            style={{
              height: 40,
              width: 100,
              borderColor: "white",
              borderWidth: 1,
              color: "white"
            }}
            onChangeText={text => (this.txtCityID = text)}
          />
          <TextInput
            style={{
              height: 40,
              width: 100,
              borderColor: "white",
              borderWidth: 1,
              color: "white"
            }}
            onChangeText={text => (this.txtBusID = text)}
          />
          <Button onPress={() => this.setID()} title="Sign In" />
        </View>
      );
    }
    //what it's going to render
    return <View style={styles.container}>{screen}</View>;
  }
}

const styles = StyleSheet.create({
  container: {
    flex: 1,
    justifyContent: "center",
    alignItems: "center",
    backgroundColor: "black"
  },
  welcome: {
    fontSize: 20,
    textAlign: "center",
    margin: 10
  },
  instructions: {
    textAlign: "center",
    color: "#333333",
    marginBottom: 5
  }
});
