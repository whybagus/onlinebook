import { Route, Redirect } from 'react-router-dom'
import React from 'react'
import cookie from 'js-cookie'
import { connect } from 'react-redux'

const PrivateRoute = ({ component: Component , ...rest }) => {
    const token = cookie.get("token")
    return (
      <Route
        {...rest}
        render={({ location }) =>
          rest.loggedIn && token ? (
            <Component {...location} />
          ) : (
            <Redirect
              to={{
                pathname: "/login",
                state: { from: location }
              }}
            />
          )
        }
      />
    );
    console.log(rest.loggedIn)
}
  const mapStoreToProps = state => {
    return {
        loggedIn: state.auth.loggedIn
    }
}

export default connect(mapStoreToProps)(PrivateRoute)

  