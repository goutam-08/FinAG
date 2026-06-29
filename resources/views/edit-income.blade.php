@extends('layouts.app')

@section('content')

<div class="container">

    <div class="card">
        <div class="card-body">

            <h3>Edit Income</h3>

            <form action="{{ route('income.update',$income->id) }}"
                  method="POST">

                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label>Category</label>

                    <select class="form-control"
                            name="category_id">

                        @foreach($categories as $category)

                            <option value="{{ $category->id }}"
                            {{ $income->category_id == $category->id ? 'selected' : '' }}>

                                {{ $category->category_name }}

                            </option>

                        @endforeach

                    </select>
                </div>

                <div class="mb-3">
                    <label>Income Source</label>

                    <input type="text"
                           name="title"
                           class="form-control"
                           value="{{ $income->title }}">
                </div>

                <div class="mb-3">
                    <label>Amount</label>

                    <input type="number"
                           name="amount"
                           class="form-control"
                           value="{{ $income->amount }}">
                </div>

                <div class="mb-3">
                    <label>Date</label>

                    <input type="date"
                           name="Cr_date"
                           class="form-control"
                           value="{{ $income->Cr_date }}">
                </div>

                <div class="mb-3">
                    <label>Description</label>

                    <textarea name="description"
                              class="form-control">{{ $income->description }}</textarea>
                </div>

                <button type="submit"
                        class="btn btn-primary">
                    Update Income
                </button>

            </form>

        </div>
    </div>

</div>

@endsection