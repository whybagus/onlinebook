import React from 'react';
import ReactDOM from 'react-dom';
import './index.css';
import App from './App';
import * as serviceWorker from './serviceWorker';
import store from './Admin/container/config/Redux/store/store';
import { Provider } from 'react-redux';
import axios from 'axios';
import cookie from 'js-cookie';
// import Login from './Admin/container/Login';
import jwt from 'jsonwebtoken';

let token = cookie.get("token");
const jwtToken = "ndsevUOBwlzu0Itl5dx1jjn03zatnBgp8ZaYtfi0akWrgWzLu878fYssbpkCL55Q"

jwt.verify(token, jwtToken, function(err, decode){
  if (err) {
    cookie.remove("token")
    token = null
  } else {
    if (decode.iss !== 'http://localhost:8000/api/login') {
      cookie.remove("token")
      token = null
    }
  }
})

const render = () => {
  ReactDOM.render(
    <Provider store={store}>
      <App />
    </Provider>
    ,
    document.getElementById('root')
  );
}
if (token) {
  axios.defaults.headers.common["Authorization"] = `Bearer ${token}`;
  axios.get('http://127.0.0.1:8000/api/me')
  .then(res => {
    store.dispatch({type: "SET_LOGIN", payload: res.data})
    render()
  }).catch(err => console.log(err))
}else {
  render()
}


// If you want your app to work offline and load faster, you can change
// unregister() to register() below. Note this comes with some pitfalls.
// Learn more about service workers: https://bit.ly/CRA-PWA
serviceWorker.unregister();
