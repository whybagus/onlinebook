import React, { Component } from 'react';
import FormBukuComp from '../../../components/pages/Forms/formPenulisComp';
import Axios from 'axios';

class FormBuku extends Component {
    state = {
      storeValue: {
        id: 9,
        nama: null,
        deskripsi: null,
      }
    }
    storeData = () => {
      Axios.post('http://localhost:8000/api/store/add-penulis', this.state.storeValue)
      .then(res => console.log(res))
      .catch(err => console.log(err))
      // console.log('hai')
    }
    handleInput = async (o) => {
        const stateSV = {...this.state.storeValue}
        stateSV[o.target.name] = o.target.value
        await this.setState({
          storeValue: stateSV
        })
        console.log(this.state.storeValue)
    }
    render(){
        return(
           <FormBukuComp input={(o) => this.handleInput(o)} click={() => this.storeData()} />
        )
    }
}

export default FormBuku