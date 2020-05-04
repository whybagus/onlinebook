import React, { Component } from 'react';
import Axios from 'axios';
import TableBuku from '../../../components/pages/DataTables/tableBuku';
// import { BrowserRouter, Link } from 'react-router-dom';

class Buku extends Component {
    state = {
        data: []
    }
    getData = () => {
        Axios.get('http://localhost:8000/api/get/buku')
        .then(res => {
            this.setState({
                data: res.data.data
            })
            // console.log(this.state.data)
        })
        .catch(err => console.log(err))
    }
    componentDidMount(){
        this.getData()
    }
    render(){
      const {data} = this.state
      console.log(data)
        return (
            <table class="table table-striped table-advance table-hover">
            <thead>
              <tr>
                <th><i class="fa fa-bullhorn"></i> Juduk</th>
                <th class="hidden-phone"><i class="fa fa-question-circle"></i> Stock</th>
                <th><i class="fa fa-bookmark"></i> Harga</th>
                <th><i class=" fa fa-edit"></i> Penulis</th>
                <th><i class=" fa fa-edit"></i> Opsi</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
            {
                data.map(data => {
                  return (
                    <TableBuku 
                      key={data.id}
                      judul={data.judul}
                      stock={data.stock}
                      harga={data.harga}
                      // penulis={data.penulis}
                    />
                  )
                })
              }
            </tbody>
          </table>
        )
    }
}
export default Buku;