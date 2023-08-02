@extends('master')

@section('title' , ' Contacts')

@push('styles')

@endpush

@section('mainTitle','Index Contacts')

@section('subTitle',' contacts')

@section('content')

<div class="container ">
    @if(session()->has('success'))
    <div class="alert alert-success">
        {{session()->get('success') }}
    </div>
    @endif

    <div class="filter mb-5">
        <form action="{{ route('customers.index') }}" method="GET" >


            <input type="text" class="mr-3" name="name" id="name" placeholder="customer name">

            <input type="email" class="mr-3" name="email" id="email" placeholder="customer email">


            <button type="submit" >Filter</button>
        </form>
    </div>

<div class="row">
    @foreach ( $customer as $customers )
<div class="col-md-3">
    <div class="card">
        <div class="card-body">
          <h5 class="card-title ">Id => {{$customers->id}}</h5>
          <h5 class="card-text ">***************************</h5>
          <p class="card-text">Nmae => {{$customers->name}}</p>
          <p class="card-text">Age => {{ $customers->age }} </p>
          <p class="card-text">Email => {{ $customers->email }} </p>
          <p class="card-text">Phone => {{ $customers->phone }} </p>
          <p class="card-text">Career => {{ $customers->career }} </p>

            <div class="d-flex justify-content-between">
                <a href="{{ route('customers.edit' , $customers->id) }}" class="btn btn-sm btn-dark">Edit</a>
                <a href="{{ route('customers.trashed' ) }}" class="btn btn-sm btn-warning">Trash</a>
                <form action="{{ route('customers.destroy' , $customers->id) }}" method="post">
                    @csrf
                    @method('delete')
                        <div >
                            <button type="submit" class="btn  btn-sm btn-danger ">Delete</button>
                        </div>
                    </form>
            </div>
        </div>
      </div>
</div>
    @endforeach
</div>

    </div>


@endsection


@push('scripts')

@endpush
