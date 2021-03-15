@extends('backend.layouts.master')
@section('content')
  

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row ">
          <div class="col-sm-6">
           
          </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
              <li class="breadcrumb-item active">Add Other Cost</li>
            </ol>
          </div>
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
 
    <!-- Main content -->
    <section class="content">
       <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
      
        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <section class="col-md-12">
           
           <div class="card">
              <div class="card-header" style="background-color: #0A4833;color: white">
                <h5>All Report
                </h5>
              </div>
            <div class="card-body">
                <table id="example1" class=" table-sm table table-bordered table-hover">
                  
                  <tr style="background-color:  #f4d03f ;color: black">
                    <th style="text-align: center">Total Member</th>
                    <th style="text-align: center">Total Credit</th>
                    <th style="text-align: center">Total Dabit</th>
                    <th style="text-align: center">Total Balance</th>
                  </tr>
                
                   
<th style="text-align: center">{{ $member->count('id') }}</th>
                    <th style="text-align: center">{{$total_amount->sum('amount')}}.00</th>
                    <th style="text-align: center">{{$total_dabit->sum('amount')}}.00</th>
                    <th style="text-align: center">{{$total_amount->sum('amount')- -$total_dabit->sum('amount')}}.00</th>
                      
                    </tr>
                   
                  </tbody>
                </table>
                </div>
              </div>
            <!-- /.card -->

            <!-- DIRECT CHAT -->
            
          </section>
          <!-- right col -->
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  @endsection