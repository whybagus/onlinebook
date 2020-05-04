import React, { Component } from 'react';
import { BrowserRouter, Link, Route } from 'react-router-dom';
import Produk from './Produk/buku';
import Genre from './Genre/genre';
import PrivateRoute from '../config/PrivateRoute';
import Buku from './Produk/buku';
import Penulis from './Penulis/penulis';
import Diskon from './Diskon/diskon';

function DataTable(){
        return (
            <BrowserRouter>
            <div className="container"> 
                <Link to="buku">
                    <p/>Buku
                </Link>
                &nbsp;
                <Link to="genre">
                    Genre
                </Link>
                &nbsp;
                <Link to="penulis">
                    Penulis
                </Link>
                &nbsp;
                <Link to="diskon">
                    Diskon<p/>
                </Link>
            </div>
                <div>
                <PrivateRoute path="/buku">
                    <Buku />
                </PrivateRoute>
                <PrivateRoute path="/genre">
                    <Genre />
                </PrivateRoute>
                <PrivateRoute path="/penulis">
                    <Penulis />
                </PrivateRoute>
                <PrivateRoute path="/diskon">
                    <Diskon />
                </PrivateRoute>
                </div>
            </BrowserRouter>
        )
    }
export default DataTable;