import { Route, Redirect } from 'react-router-dom'
import React from 'react'
import cookie from 'js-cookie'
import { connect } from 'react-redux'

const GuestRoute = ({ component: Component , ...rest }) => {
    return (
      <Route
        {...rest}
        render={({ location }) =>
          !rest.loggedIn ? (
            <Component {...location} />
          ) : (
            <Redirect
              to={{
                pathname: "/dashboard",
                state: { from: location }
              }}
            />
          )
        }
      />
    );
  }
  const mapStoreToProps = state => {
    return {
        loggedIn: state.auth.loggedIn
    }
  }

  export default  connect(mapStoreToProps)(GuestRoute)