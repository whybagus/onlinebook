import React from 'react';

const TableBuku = (props) =>{
    return (
        <tr>
        <td>
          <a href="basic_table.html#">{props.judul}</a>
        </td>
        <td class="hidden-phone">{props.stock}</td>
        <td>{props.harga}</td>
    <td><span class="label label-info label-mini">{props.penulis}</span></td>
        <td>
          <button class="btn btn-success btn-xs"><i class="fa fa-check"></i></button>
          <button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button>
          <button class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></button>
        </td>
      </tr>
    )
}

export default TableBuku;