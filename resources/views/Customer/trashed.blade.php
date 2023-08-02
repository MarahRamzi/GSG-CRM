@extends('master')

@section('title' , ' Trashed Contacts')

@push('styles')

@endpush

@section('mainTitle',' Trashed Contacts')

@section('subTitle',' trashed contacts')

@section('content')

<div class="container ">
    @if(session()->has('success'))
    <div class="alert alert-success">
        {{session()->get('success') }}
    </div>
    @endif

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
               <form action="{{ route('customers.restore' , $customers->id) }}" method="post">
            @csrf
            @method('put')
                <div >
                    <button type="submit" class="btn  btn-sm btn-danger mt-2">Restore</button>
                </div>
            </form>
                <form action="{{ route('customers.force-delete' , $customers->id) }}" method="post">
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
