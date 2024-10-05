@extends('instuctor\instuctor_dashboard')

@section('content')



<div class="chat-wrapper">
    <div class="chat-sidebar">
        <div class="chat-sidebar-header">
            <div class="d-flex align-items-center">
                <div class="chat-user-online">
                    <img src="{{ (!empty($instructor_data->photo)) ? url('uploads/instuctor_img/'.$instructor_data->photo) : url('uploads/no_image.jpg') }}" width="45" height="45" class="rounded-circle"
                        alt="" />
                </div>
                <div class="flex-grow-1 ms-2">
                    <p class="mb-0">{{ $instructor_data->name }}</p>
                </div>
            </div>
            <hr>

        </div>
        <div class="chat-sidebar-content">
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-Chats">
                    <div class="chat-list">
                        <div class="list-group list-group-flush">
                            <a href="javascript:;" class="list-group-item">
                                <div class="d-flex">
                                    <div class="chat-user-online">
                                        <img src="{{ (!empty($questions->user->photo)) ? url('uploads/user_img/'.$questions->user->photo) : url('uploads/no_image.jpg') }}" width="42" height="42"
                                            class="rounded-circle" alt="" />
                                    </div>
                                    <div class="flex-grow-1 ms-2">
                                        <h6 class="mb-0 chat-title">{{$questions->user->name }}
                                        </h6>
                                        <p class="mb-0 chat-msg">{{ $questions->subject }}</p>
                                    </div>
                                    <div class="chat-time">{{ Carbon\Carbon::parse($questions->created_at)->diffForHumans() }}</div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="chat-header d-flex align-items-center">
        <div class="chat-toggle-btn"><i class='bx bx-menu-alt-left'></i>
        </div>
        <div>
            <h4 class="mb-1 font-weight-bold"><span>Course Name:</span>&nbsp;{{$questions->course->course_name }}</h4>
        </div>
        <div class="chat-top-header-menu ms-auto"> <a href="javascript:;"><i class='bx bx-video'></i></a>
            <a href="javascript:;"><i class='bx bx-phone'></i></a>
            <a href="javascript:;"><i class='bx bx-user-plus'></i></a>
        </div>
    </div>
    <div class="chat-content">
        <div class="chat-content-leftside">
            <div class="d-flex">
                <img src="{{ (!empty($questions->user->photo)) ? url('uploads/user_img/'.$questions->user->photo) : url('uploads/no_image.jpg') }}" width="48" height="48" class="rounded-circle" alt="" />
                <div class="flex-grow-1 ms-2">
                    <p class="mb-0 chat-time">{{$questions->user->name }}, {{ Carbon\Carbon::parse($questions->created_at)->diffForHumans() }}</p>
                    <p class="chat-left-msg">{{$questions->question }}</p>
                </div>
            </div>
        </div>
        @foreach ($replay as $rep)

        <div class="chat-content-rightside">
            <div class="d-flex ms-auto">
                <div class="flex-grow-1 me-2">
                    <p class="mb-0 chat-time text-end">you, {{ Carbon\Carbon::parse($rep->created_at)->diffForHumans() }}</p>
                    <p class="chat-right-msg">{{ $rep->question }}</p>
                </div>
            </div>
        </div>

        @endforeach

    </div>


    <form action="{{ route('instuctor.question.answer',$questions->id) }}" method="post">
        @csrf

        <input type="hidden" name="user_id" value="{{ $questions->user_id }}">
        <input type="hidden" name="instructor_id" value="{{ $questions->instructor_id }}">
        <input type="hidden" name="course_id" value="{{ $questions->course_id }}">
        <input type="hidden" name="subject" value="{{ $questions->subject }}">

        <div class="chat-footer d-flex align-items-center">
            <div class="flex-grow-1 pe-2">
                <div class="input-group">
                    <input type="text" name="question" class="form-control @error('question') is-invalid @enderror" placeholder="Type a message">

                    @error('question')
                    <br> <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="chat-footer-menu">
                <button type="submit" class="form-control"><i class='bx bx-send'></i></button>
            </div>
        </div>
    </form>

    <!--start chat overlay-->
    <div class="overlay chat-toggle-btn-mobile"></div>
    <!--end chat overlay-->
</div>




@endsection
