@extends('layouts.app')
   
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Lucky Draw</div>
                <div class="card-body">
                    <div class="card-body">
                        <form method="POST" action="{{ route('userSubmitForm') }}">
                            @csrf
                            <div class="form-group mb-3">
                                <div class="form-group-prepend">
                                <label class="form-group-text" for="draw_number">Please Enter Your Draw Number :</label>
                                </div>
                                <input id="draw_number" type="text" maxlength="4" onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))" class="form-control @error('draw_number') is-invalid @enderror" name="draw_number" required>

                                @error("draw_number")
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group row" style="justify-content: center;">
                                <div class="text-center" >
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Confirm Draw !') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="card-footer text-center"><a href="{{route('home')}}" type="button" class="btn btn-warning">Back To Home</a></div>
            </div>
        </div>
    </div>
</div>
@endsection