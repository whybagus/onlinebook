import React, { Fragment } from 'react';
import Login from './Admin/container/Login';
import { Link, BrowserRouter as Router, Route, Switch} from 'react-router-dom';
import Dashboard from './Admin/container/Dashboard/Dashboard';
import GuestRoute from './Admin/container/config/GuestRoute';
import PrivateRoute from './Admin/container/config/PrivateRoute';
import DataTable from './Admin/container/DataTables/dataTable';

// import logo from './logo.svg';
// import './App.css';

function App() {
  return (
  <Router>
    <Switch>
      <GuestRoute exact path="/login" component={Login} />
      <PrivateRoute path="/dashboard" component={Dashboard} />
      <Route  path="/data_table">
              <DataTable />
      </Route>
    </Switch>
  </Router>
  );
}

export default App;
