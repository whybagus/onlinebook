import React from 'react';

const ButtonLogin = (props) => {
    return (
        <button className="btn btn-theme btn-block"  onClick={props.handleLogin} type="button"><i className="fa fa-lock"></i> 
        LOGIN
        </button>
            )
}

export default ButtonLogin;