import React, { Component, Fragment } from 'react';
import './../../assets/img/img3.jpg'
import {withRouter, Link } from 'react-router-dom';
class Sidebar extends Component {
    render(){
        return (
            <div id="sidebar" className="nav-collapse ">
              <ul className="sidebar-menu" id="nav-accordion">
                  <p className="centered"><a href="profile.html"><img src={require('./img3.jpg')} className="img-circle" width="80" /></a></p>
                  <h5 className="centered">ars</h5>
                  <li className="mt">
                      <a className="active" href="index.html">
                      <i className="fa fa-dashboard"></i>
                      <span>Dashboard</span>
                      </a>
                  </li>
                  <li class="sub-menu">
                  <a onClick={} id="data_table" to="/data_table">
                    <i class="fa fa-th"></i>
                    <span>Data Tables</span>
                    </a>
                  </li>
              </ul>
            </div>
        )
    }
}

export default  withRouter(Sidebar);