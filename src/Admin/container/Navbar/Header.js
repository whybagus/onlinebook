import React, { Component } from 'react';
import { withRouter } from 'react-router-dom';

class Header extends Component {
    handleClick = () => {
       this.props.Click(true)
    }
    logoClick = () => {
        this.props.history.push('/dashboard')
    }
    
    render(){
        return (
            <header className="header black-bg">
                <div className="sidebar-toggle-box">
                    <div className="fa fa-bars tooltips" onClick={this.handleClick}  data-placement="right" data-original-title="Toggle Navigation"></div>
                </div>
                <a className="logo"><b>DASH<span>IO</span></b></a>
                <div className="nav notify-row" id="top_menu">
                </div>
                <div className="top-menu">
                    <ul className="nav pull-right top-menu">
                    <li><a className="logout" href="login.html">Logout</a></li>
                    </ul>
                </div>
                </header>
        )
    }
}
export default withRouter(Header);