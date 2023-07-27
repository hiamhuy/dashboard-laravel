@extends('app.layouts.app')
@section('title', 'Role')
@section('page-id', 'role')
@section('main')

<div class="container">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-6 d-flex justify-content-start">
                    <form action="/dashboard/category" method="GET">
                        <div class="f-search">
                            <input type="search" name="searchData" class="form-control" id="search-table" placeholder="enter search...">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </div>
                    </form>
                </div>
            </div>

            <div class="row mt-2">
                <div class="col-12">
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col" style="width:60px">#</th>
                            <th scope="col">Tên</th>
                            <th scope="col" style="width:100px">Email</th>
                            <th scope="col" style="width:150px">Status</th>
                            <th scope="col" style="width:120px">Role</th>
                            <th scope="col" style="width:120px">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                                <tr>
                                    <th style="width:60px" scope="row"></th>
                                    <td></td>
                                    <td style="width:100px">
                                        
                                    </td>
                                    <td style="width:150px">

                                    </td>
                                    <td style="width:120px">

                                    </td>

                                    <td style="width:120px">
                                        <a href="">Sửa</a>
                                    </td>
                                  </tr>

                        </tbody>
                      </table>
                </div>
                <div class="col-12">
                    <nav class="d-flex justify-content-end align-items-center">

                        <div class="fw-bold fs-6">Tổng: bản ghi</div>
                        <div class="p-3"></div>
                    
                     
                    </nav>
              </div>
           </div>

        </div>
    </div>
</div>

@endsection