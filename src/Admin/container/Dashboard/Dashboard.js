import React, { Component, Fragment } from 'react';
import Header from './../Navbar/Header';
import Sidebar from './../Sidebar/Sidebar';
import './../../assets/css/style-responsive.css';
import './../../assets/css/table-responsive.css';
import './../../assets/css/style.css';
// import './../../assets/css/to-do.css';
import './../../assets/lib/bootstrap/css/bootstrap.min.css';
// import './../../assets/lib/chart-master/Chart.js'
// import './../../assets/lib/font-awesome/css/font-awesome.css';
// import './../../assets/lib/common-scripts.js';
import { connect } from 'react-redux';
// import './../../assets/lib/jquery/jquery.min.js';
// import './../../assets/lib/bootstrap/js/bootstrap.min.js';
// import './../../assets/lib/jquery/jquery.backstretch.min.js';

class Dashboard extends Component {
    state = {
        sidebar : false,
    }
    handleClickDash = async (v) => {
        await this.setState({
            sidebar: v
        })
        if (this.state.sidebar === true) {
            const section = document.getElementById('container')
            section.classList.toggle('sidebar-closed')
        }
    }
    render(){
        
        return(
            <Fragment>
                <section id="container" >
                <Header Click={(v) => this.handleClickDash(v)}  />
                <Sidebar />
                </section>
            </Fragment>
        )
    }
}

export default Dashboard;