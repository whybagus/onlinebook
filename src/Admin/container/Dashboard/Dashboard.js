import React, { Component, Fragment } from 'react';
import Header from './../Navbar/Header';
import './../../assets/css/style-responsive.css';
import './../../assets/css/table-responsive.css';
import './../../assets/css/style.css';
import './../../assets/lib/bootstrap/css/bootstrap.min.css';
import { Switch, Route } from 'react-router';
import Index from '.';
import DataTable from '../DataTables/dataTable';
import { Link, BrowserRouter } from 'react-router-dom';
// import Produk from '../DataTables/Produk/buku';
import Forms from '../Form/Forms';

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
            <BrowserRouter>
            <Fragment>
                <section id="container" >
                <Header Click={(v) => this.handleClickDash(v)}  />
                <div id="sidebar" className="nav-collapse ">
                    <ul className="sidebar-menu" id="nav-accordion">
                        <p className="centered"><a href="profile.html"><img src={require('../Sidebar/img3.jpg')} className="img-circle" width="80" /></a></p>
                        <h5 className="centered">ars</h5>
                        <li className="mt">
                            <a className="active" href="index.html">
                            <i className="fa fa-dashboard"></i>
                            <span>Dashboard</span>
                            </a>
                        </li>
                        <li className="sub-menu">
                        <Link id="data_table" to="/data_table">
                            <i className="fa fa-th"></i>
                            <span>Data Tables</span>
                            </Link>
                         </li>
                            <li className="sub-menu">
                            <Link to="/form">
                            <i className="fa fa-tasks"></i>
                            <span>Forms</span>
                            </Link>
                        </li>
                    </ul>
                 </div>
                <Switch>
                <section id="main-content">
                     <section className="wrapper">
                        <Route path="/index">
                            <Index />
                        </Route>
                        <Route path="/data_table">
                            <DataTable />
                        </Route>
                        <Route path="/form">
                            <Forms />
                        </Route>
                    </section>
                  </section>
                </Switch>
                </section>
            </Fragment>
            </BrowserRouter>
        )
    }
}

export default Dashboard;