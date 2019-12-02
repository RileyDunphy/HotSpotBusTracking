import React, { Component } from "react";
import {
  ScrollView,
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
import RadioForm, { RadioButton, RadioButtonInput, RadioButtonLabel } from 'react-native-simple-radio-button';

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
    signedIn: false,
    routeScreen: false,
    date: null
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

  showTime() {
    var date = new Date();
    var h = date.getHours(); // 0 - 23
    var m = date.getMinutes(); // 0 - 59
    var s = date.getSeconds(); // 0 - 59
    var session = "AM";

    if (h == 0) {
      h = 12;
    }

    if (h > 12) {
      h = h - 12;
      session = "PM";
    }

    h = (h < 10) ? "0" + h : h;
    m = (m < 10) ? "0" + m : m;
    s = (s < 10) ? "0" + s : s;

    return h + ":" + m + " " + session;
  }
  //author Josh
  getCityRoutes = async () => {
    var city = await AsyncStorage.getItem("cityID");
    fetch("https://hotspotparking.com/busTracking/getRoutesForCity", {
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
  setRoute(routeValue) {
    this.state.selectedRoute = routeValue;
    if (routeValue > 0) {
      this.offline = 0;
    } else if (routeValue <= 0) {
      this.offline = 1;
    }
    this.routeScreen = false;
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

        var timeFormatted =
          ts.getFullYear() +
          "-" +
          (ts.getMonth() + 1) +
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
          "https://hotspotparking.com/busTracking/submitBusTrackingInformation",
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
            <Text style={{
              color: "white",
              fontSize: 40
            }}>Please enter Bus ID</Text>
          </View>
          <TextInput
            style={{
              height: 40,
              width: 100,
              borderColor: "white",
              borderWidth: 1,
              color: "white",
              fontSize: 40
            }}
            onChangeText={text => (this.txtBusID = text)}
          />
          <Button onPress={() => this.setID()} title="Change ID" />
        </View>
      );
    } else if (this.routeScreen) {
      screen = (
        <View style={styles.container}>
          <Text>{"\n"}{"\n"}</Text>
          <ScrollView>
            <RadioForm
              labelColor={'white'}
              selectedLabelColor={'lightblue'}
              labelStyle={{ fontSize: 30, padding: 15 }}
              initial={this.state.selectedRoute}
              radio_props={Object.keys(this.state.routelist.data).map(key => {
                return (
                  { label: this.state.routelist.data[key], value: key }
                );
              })}
              onPress={(value) =>
                this.setRoute(value)}
            />
          </ScrollView>
        </View>
      );
    }
    else if (this.signedIn) {

      console.log(this.state.selectedRoute);
      screen = (
        <View style={styles.container}>
          <Text style={{
            position: "absolute",
            top: 0,
            color: "white",
            fontSize: 60
          }}>
            {"\n"}{this.showTime()}
          </Text>
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
                fontSize: 30
              }}
            >
              {this.busID} - Change
            </Text>
          </TouchableOpacity>
          <Text
            style={{
              color: "white",
              fontSize: 40
            }}
          >
            Current Route
          </Text>
          <Text
            style={{
              color: "white",
              fontSize: 70,
              justifyContent: "center",
              alignItems: "center",
              textAlign: "center",
              borderBottomWidth: 20,
              padding: 20
            }}
          >
            {this.state.routelist.data[this.state.selectedRoute]}
          </Text>
          <TouchableOpacity
            onPress={() => this.routeScreen = true}
          >
            <Text
              style={{
                color: "white",
                backgroundColor: "black",
                fontSize: 40,
                borderColor: "white",
                borderWidth: 2
              }}
            >
              &nbsp;Change Route&nbsp;
            </Text>
          </TouchableOpacity>
          <Text>{"\n"}</Text>
          <TouchableOpacity
            onPress={() => this.setRoute(0)}
          >
            <Text
              style={{
                color: "white",
                backgroundColor: "black",
                fontSize: 40,
                borderColor: "white",
                borderWidth: 2
              }}
            >
              &nbsp;Out of Service&nbsp;
            </Text>
          </TouchableOpacity>
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
              color: "white",
              fontSize: 40
            }}
            onChangeText={text => (this.txtCityID = text)}
          />
          <TextInput
            style={{
              height: 40,
              width: 100,
              borderColor: "white",
              borderWidth: 1,
              color: "white",
              fontSize: 40
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
