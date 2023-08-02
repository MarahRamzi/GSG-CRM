@extends('master')

@section('title' , 'new contacts')

@push('styles')

@endpush

@section('mainTitle','Add Contacts')

@section('subTitle','add contacts')

@section('content')


<div class="container ">

    <form action="{{ route('customers.store') }}" method="post" >
        @csrf
        <div class="form-floating mb-4 mt-3">
            <label for="name"> Name</label>
            <input type="text" @class(['form-control', 'is-invalid' => $errors->has('name')]) id="name" name = "name" placeholder="enter customer name" value={{ old('name') }}>
          @error('name')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>


          <div class="form-floating mb-4">
            <label for="age">Age</label>
            <input type="text" @class(['form-control', 'is-invalid' => $errors->has('age')]) id="age" name ="age" placeholder="enter age"  value={{ old('age') }}>
            @error('age')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>

          <div class="form-floating mb-4">
            <label for="email">Email</label>
            <input type="text" @class(['form-control', 'is-invalid' => $errors->has('email')]) id="email" name ="email" placeholder="enter email " value={{ old('email') }}>
            @error('email')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>

        <div class="form-floating mb-4">
            <label for="email">Phone</label>
            <input type="text" @class(['form-control', 'is-invalid' => $errors->has('phone')]) id="phone" name ="phone" placeholder="enter phone " value={{ old('phone') }}>
            @error('phone')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>

          <div class="form-floating mb-4">
            <label for="address">Address</label>
            <input type="text" @class(['form-control', 'is-invalid' => $errors->has('address')]) id="address" name ="address" placeholder="enter address " value={{ old('address') }}>
            @error('address')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>

        <div class="form-floating mb-4">
            <label for="address">Career</label>
            <input type="text" @class(['form-control', 'is-invalid' => $errors->has('career') ]) id="career" name ="career" placeholder="enter career " value={{ old('career') }}>
            @error('career')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>



          <button type="submit" class="btn btn-primary mb-3">Create contacts</button>
    </form>
</div>

@endsection

@push('scripts')

@endpush
