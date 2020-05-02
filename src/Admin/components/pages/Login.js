import React, { Component, Fragment } from 'react';
import ButtonLogin from '../atom/ButtonLogin';
import axios from 'axios';
import { withRouter } from 'react-router-dom';
import cookie from 'js-cookie';
import { connect } from 'react-redux';
// import ButtonLogin from '../atom/ButtonLogin';

class LoginComponent extends Component{
    
    state = {
        login: null,
        data: {
            data: null,
        },
        formValue :{
            email: null,
            password: null,
        }
    }
    Login = async () => {
        await axios.post('http://localhost:8000/api/login', this.state.formValue)
        .then((res) =>  {
            console.log(res)
            this.setState({
                login: res.data.success,
                data: {
                    data: res.data
                }
            })
            // cookie.set("user", JSON.stringify(res.data.data.user))
            cookie.set("token", res.data.data.token)
            this.props.setLogin(res.data.data.user)
            if (this.state.login === false) {
                return null
            }
            this.props.history.push('/dashboard') 
            console.log(this.state)
            // this.authenticated(res)
        })
        .catch((err) => console.log(err))
    }
    handleOnInput = async (e) => {
        let change = {...this.state.formValue}
        change[e.target.name] = e.target.value
        await this.setState({
            formValue: change
        })
        // console.log(this.state.formValue)
    }
    render() { 
       
        return (
        <div id="login-page">
            <div className="container">
            <form className="form-login" action="index.html">
                <h2 className="form-login-heading">sign in now</h2>
                <div className="login-wrap">
                <input type="text" className="form-control" placeholder="Email" id="email" name="email" onInput={this.handleOnInput} autoFocus/>
                <br/>
                <input type="password" className="form-control" placeholder="Password" id="password" name="password" onInput={this.handleOnInput} />
                {
                     this.state.login === false ? (
                         <Fragment>
                             <br />
                             <p className="wrong-credential">Email atau password salah!</p> 
                         </Fragment>
                     ) : null
                }
                <label className="checkbox">
                    <input type="checkbox" value="remember-me" /> Remember me
                    <span className="pull-right">
                    <a data-toggle="modal" href="login.html#myModal"> Forgot Password?</a>
                    </span>
                </label>
                <ButtonLogin handleLogin={this.Login}/>
                </div>
                <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabIndex="-1" id="myModal"
                className="modal fade">
                <div className="modal-dialog">
                    <div className="modal-content">
                    <div className="modal-header">
                        <button type="button" className="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 className="modal-title">Forgot Password ?</h4>
                    </div>
                    <div className="modal-body">
                        <p>Enter your e-mail address below to reset your password.</p>
                        <input type="text" name="email" placeholder="Email" autoComplete="off"
                        className="form-control placeholder-no-fix" />
                    </div>
                    <div className="modal-footer">
                        <button data-dismiss="modal" className="btn btn-default" type="button">Cancel</button>
                        <button className="btn btn-theme" type="button">Submit</button>
                    </div>
                    </div>
                </div>
                </div>
            </form>
            </div>
    </div> 
        )
    }
}
const exportLogin = withRouter(LoginComponent)
const mapDispatchToProps = dispatch => {
    return {
        setLogin: (user) => dispatch({type:"SET_LOGIN", payload: user})
    }
}
export default connect(null, mapDispatchToProps)(exportLogin);