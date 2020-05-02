import React, { Component } from 'react';
import './../assets/css/style-responsive.css';
import './../assets/css/table-responsive.css';
import './../assets/css/style.css';
import './../assets/css/to-do.css';
// import './../assets/lib/jquery/jquery.min.js';
// import './../assets/lib/bootstrap/js/bootstrap.min.js';
// import './../assets/lib/jquery/jquery.backstretch.min.js';
import './../assets/lib/bootstrap/css/bootstrap.min.css';
import './../assets/lib/font-awesome/css/font-awesome.css';
// import ButtonLogin from '../components/atom/ButtonLogin';
import LoginComponent from '../components/pages/Login';


class Login extends Component {
    render(){
        return (
            <LoginComponent />
        )
    }
}

export default Login;