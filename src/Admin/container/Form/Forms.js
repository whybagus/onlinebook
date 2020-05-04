import React from 'react';
import FormPenulis from './Penulis/formPenulis';
import FormBuku from './Penulis/formPenulis';
import { Link,BrowserRouter} from 'react-router-dom';
import PrivateRoute from '../config/PrivateRoute';

const Forms = (props) => {
    return(
        <BrowserRouter>
        <div className="container"> 
            <Link to="form-buku">
                <p/>Buku
            </Link>
            &nbsp;
            <Link to="form-penulis">
                Penulis
            </Link>
            &nbsp;
            <Link to="form-genre">
                Genre
            </Link>
            &nbsp;
            <Link to="form-diskon">
                Diskon<p/>
            </Link>
        </div>
            <div>
            <PrivateRoute path="/form-buku">
                <FormPenulis />
            </PrivateRoute>
            {/* <PrivateRoute path="/form-genre">
                <FormGenre />
            </PrivateRoute> */}
            <PrivateRoute path="/form-penulis">
                <FormPenulis />
            </PrivateRoute>
            {/* <PrivateRoute path="/form-diskon">
                <FormDiskon />
            </PrivateRoute> */}
            </div>
        </BrowserRouter>
    )
}
export default Forms