<template>
<div id="customer">
<div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Customers List</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                   <table id="example1" class="table table-bordered table-hover table-sm">
                  <thead>
                   <tr style="background-color: #641e16;color: white">
                    <th>SL</th>
                    <th>ID</th>
                    <th>Customer Name</th>
                    <th>Father Name</th>
                    <th>Mobile</th>
                    <th>Address</th>
                    <th>Seat No</th>
                    <th>Total Amount</th>
                    {{-- <th>Image</th> --}}
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                   
            <tr style="">
                      <td>1</td>
                      <td>1</td>
                      <td>1</td>
                      <td>1</td>
                      <td>1</td>
                      <td>1</td>
                      <td>1</td>
                      <td style="text-align: center;">1</td>
                      <td>
                       
                  
                      </td> 
                    </tr>
                   
                  </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>
</div>
</template>