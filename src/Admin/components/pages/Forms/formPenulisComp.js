import React from 'react';

const FormBukuComp = (props) => {
    return(
        <div className="row mt">
        <div className="col-lg-12">
          <h4><i className="fa fa-angle-right"></i>Penulis</h4>
          <div className="form-panel">
            <div className=" form">
              <form className="cmxform form-horizontal style-form" id="commentForm" method="get" action="">
                <div className="form-group ">
                  <label htmlFor="cname" className="control-label col-lg-2">Nama</label>
                  <div className="col-lg-10">
                    <input className=" form-control" id="cname" onInput={props.input} name="nama" minLength="2" type="text" required />
                  </div>
                </div>
                <div className="form-group ">
                  <label htmlFor="curl" className="control-label col-lg-2">Deskripsi</label>
                  <div className="col-lg-10">
                    <textarea className="form-control " id="curl" type="text" onInput={props.input} name="deskripsi"></textarea>
                  </div>
                </div>
                <div className="form-group ">
                <label htmlFor="ccomment" className="control-label col-lg-2">Gender</label>
                    <label className="checkbox-inline"/>
                <input type="checkbox" id="inlineCheckbox1"name="gender" onChange={props.input} value="L"/> L
                <label className="checkbox-inline"/>
                    <input type="checkbox" id="inlineCheckbox2" nama="gender" onChange={props.input} value="P"/> P
                </div>
               <div className="form-group">
               <label htmlFor="ccomment" className="control-label col-lg-2">Image</label>
              <div className="col-md-4">
                <input type="file" className="default" onInput={props.input} />
              </div>
            </div>
                <div className="form-group">
                  <div className="col-lg-offset-2 col-lg-10">
                    <button className="btn btn-theme" onClick={props.click} type="button">Save</button>
                    <button className="btn btn-theme04" type="button">Cancel</button>
                  </div>
                </div>        
              </form>
            </div>
          </div>
          </div>
          </div>
    )
}

export default FormBukuComp;