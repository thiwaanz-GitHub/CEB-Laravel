@extends('layouts.app')

@section('sidebar')
    @include('mreader.sidebar')
@endsection

@section('content')
    <div class="container py-3">

        {{-- Breadcrumbs --}}
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('mreader.home') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Customers</li>
            </ol>
        </nav>

        {{-- Heading --}}
        <h2 class="fw-bold">Registed Customers</h2>


        <div class="container d-flex justify-content-between align-items-end">
            {{-- Search Button --}}
            <div class="search">
                <label for="AccountNo" class="rounded mb-1">Account No</label>
                <div class="input-group">
                    <input type="search" class="form-control rounded" placeholder="Search" aria-label="Search"
                        aria-describedby="search-addon" />
                    <button type="button" class="btn btn-outline-success">Search</button>
                </div>
            </div>

            {{-- Add Meter Reading (Manual) --}}
            <div class="add-customer">
                <button class="btn btn-outline-success rounded" type="button" data-bs-toggle="modal"
                    data-bs-target="#modelNewCustomer">
                    <i class="bi bi-plus-lg mx-1"></i>New Customer
                </button>
            </div>
        </div>

        {{-- Table --}}
        <div class="container py-4">
            <table class="table table-bordered table-hover">
                <thead class="bg-secondary">
                    <tr class="">
                        <th class="col-1">ID</th>
                        <th class="col-3">Name</th>
                        <th class="col-2">Account No</th>
                        <th class="col-2">Acc. Type</th>
                        <th class="col-3">Address</th>
                        <th class="col-1">Status</th>
                    </tr>
                </thead>
                <tbody class="table-light">

                    @foreach ($users as $user)
                        <tr onclick="window.location.href=''">
                            <th scope="row">{{ $user->id }}</th>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->account_number }}</td>
                            <td>{{ $user->account_type }}</td>
                            <td>{{ $user->address }}</td>
                            <td>{{ $user->is_active }}</td>
                        </tr>
                    @endforeach


                </tbody>
            </table>
        </div>

        {{-- Model - Add Meter Reading --}}
        <div class="modal fade" id="modelNewCustomer" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="NewCustomerLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="NewCustomerLabel">Register New Customer</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="{{ route('mreader.registerCustomer') }}">
                            @csrf
                            <div class="mb-3">
                                <label for="fname" class="col-form-label">Full Name:</label>
                                <input type="text" class="form-control" id="fname" name="fname" required>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="col-form-label">Email:</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                            <div class="mb-3">
                                <label for="address" class="col-form-label">Address:</label>
                                <input type="text" class="form-control" id="address" name="address" required>
                            </div>
                            <div class="mb-3">
                                <label for="pNumber" class="col-form-label">Phone Number:</label>
                                <input type="number" class="form-control" id="pNumber" name="pNumber" required>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-outline-success" name="submit">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endsection
