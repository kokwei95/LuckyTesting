@extends('layouts.app')
   
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Lucky Draw</div>
                <div class="card-body">
                    <div class="card-body">
                        <form method="POST" action="{{ route('submitForm') }}">
                            @csrf
                            <div class="form-group mb-3">
                                <div class="form-group-prepend">
                                  <label class="form-group-text" for="prize_type">Prize Types</label>
                                </div>
                                <select class="form-control" id="prize_type" name="prize_type" class="form-control @error('prize_type') is-invalid @enderror" required>
                                    <option value="">Choose...</option>
                                    @foreach($dropdown as $drp)
                                        <option value="{{$drp->name}}">{{$drp->title}}</option>
                                    @endforeach
                                </select>

                                @error('prize_type')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <div class="form-group-prepend">
                                  <label class="form-group-text" for="auto_generate">Generate Randomly</label>
                                </div>
                                <select class="form-control" id="auto_generate" name="auto_generate" class="form-control @error('auto_generate') is-invalid @enderror" required>
                                    <option value="">Choose...</option>
                                    <option value="yes">YES</option>
                                    <option value="no">NO</option>
                                </select>

                                @error('auto_genearate')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <div class="form-group-prepend">
                                  <label class="form-group-text" for="winner_number">Winner Number</label>
                                </div>
                                <select class="form-control" id="winner_number" name="winner_number" class="form-control @error('winner_number') is-invalid @enderror">
                                    <option value="">Choose...</option>
                                    @foreach($data as $draw)
                                    <option value="{{$draw->draw_number}}">{{$draw->draw_number}}</option>
                                    @endforeach
                                </select>

                                @error('winner_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group row" style="justify-content: center;">
                                <div class="text-center" >
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Draw') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="card-footer text-center"><a href="{{route('admin.home')}}" type="button" class="btn btn-warning">Back To Home</a></div>
            </div>
        </div>
    </div>
</div>
@endsection