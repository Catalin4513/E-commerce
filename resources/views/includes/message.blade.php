<div class="row expanded">
    <div class="column medium-11">
        @if((isset($errors) && count($errors)) || \App\classes\Session::has('error'))
            <div class="callout alert" data-closable>
                @if(\App\classes\Session::has('error'))
                    {{ \App\classes\Session::flash('error') }}
                @else
                    @foreach($errors as $error_array)
                        @foreach($error_array as $error_item)
                            {{ $error_item }} <br />
                        @endforeach
                    @endforeach
                @endif
            
                <button class="close-button" arial-label="Dismiss Message" type="button" data-close>
                    <span arial-hidden="true">&times;</span>
                </button>
            </div>
        @endif
    
        @if(isset($success) || \App\classes\Session::has('success'))
            <div class="callout success" data-closable>
                @if(isset($success))
                    {{ $success }}
                @elseif(\App\classes\Session::has('success'))
                    {{ \App\classes\Session::flash('success') }}
                @endif
                <button class="close-button" arial-label="Dismiss Message" type="button" data-close>
                    <span arial-hidden="true">&times;</span>
                </button>
            </div>
        @endif
    </div>
</div>