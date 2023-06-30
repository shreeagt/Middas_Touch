@extends('layouts.app-master')

@section('content')

    <link rel="stylesheet" href="{{ asset('theme/css/video.css') }}">


    <div class="bg-light p-4 rounded">
        <h1>Video</h1>

        <div class="mt-2">
            @include('layouts.partials.messages')
        </div>

        <table class="table table-striped">
            @php
                $i = 1;
            @endphp
            @if (Auth::user()->hasRole('so'))
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Clinick Name</th>
                        <th>Button</th>
                        <th>Video status</th>
                        <th>Doctor Instruction</th>
                        <th>Play</th>
                    </tr>
                </thead>
                <tbody>
                    @if (isset($videos[0]->firstname) != '')
                        @foreach ($videos as $video)
                            <tr>
                                @php
                                    $video_for_modal = 'videos/gallery/' . $video->video_path;
                                @endphp
                                <td>{{ $i }}</td>
                                <td>{{ $video->firstname }}</td>
                                <td>{{ $video->lastname }}</td>
                                <td>
                                    @if ($video->dr_video_status == '')
                                        <a href="{{ route('videoList.update', $column_id = $video->id) }}"
                                            class="btn btn-success">Approve</a>
                                        <a href="{{ route('videoLiist.reject', $column_id = $video->id) }}"
                                            class="btn btn-danger">Reject</a>
                                    @else
                                        <a href="#" class="btn btn-secondary ">Approve</a>
                                        <a href="#" class="btn btn-secondary ">Reject</a>
                                    @endif
                                </td>
                                <td>
                                    @if ($video->dr_video_status == '')
                                        <a href="#" class="btn btn-warning">Pending</a>
                                    @elseif($video->dr_video_status == 'Approved')
                                        <a href="#" class="btn btn-primary">Approve</a>
                                    @else
                                        <a href="#" class="btn btn-dark">Rejected</a>
                                    @endif
                                </td>
                                <td>{{$video->doctor_instruction}}</td>
                                <td><a href="#" class="btn btn-info playbtn_video" id="playButton">Play</a></td>
                                <div id="videoModal" class="modal open_video">
                                    <div class="modal-content">
                                        <span class="close close_video">&times;</span>
                                        {{-- <embed src="{{asset($video_for_modal)}}" controls autoplay style="justify-content-center align-item-center"/> --}}
                                        <video src="{{ asset($video_for_modal) }}" controls
                                            style="justify-content-center align-item-center"></video>
                                    </div>
                                </div>
                            </tr>
                            @php
                                $i++;
                            @endphp
                        @endforeach
                    @else
                        <tr>
                            <td colspan='6'>
                                <h1>No videos to show</h1>
                            </td>
                        </tr>
                    @endif
                </tbody>
            @else
                <thead>

                    <tr>
                        <th>Id</th>
                        <th>So Name</th>
                        <th>Doctor Name</th>
                        <th>Clinick Name</th>
                        <th>Clinick Address</th>
                        <th>doctor_instruction</th>
                        <th>Play</th>
                    </tr>
                </thead>
                <tbody>
                    @if (isset($doctor_details[0]->firstname) != '')
                        @foreach ($doctor_details as $details)
                            @php
                                $video_for_modal = 'videos/gallery/' . $details->video_path;
                            @endphp
                            <tr>

                                @foreach ($so_details as $so_detail)
                                    @if ($so_detail->id == $details->soid)
                                        <td>{{ $i }}</td>
                                        <td>{{ $so_detail->firstname }}</td>
                                    @endif
                                @endforeach
                                <td>{{ $details->firstname }}</td>
                                <td>{{ $details->lastname }}</td>
                                <td>{{ $details->city }}</td>
                                <td>{{$details->doctor_instruction}}</td>
                                <td><a href="#" class="btn btn-info playbtn_video" id="playButton">Play</a></td>
                                <div id="videoModal" class="modal open_video">
                                    <div class="modal-content">
                                        <span class="close close_video">&times;</span>
                                        <video src="{{ asset($video_for_modal) }}" controls
                                            style="justify-content-center align-item-center"></video>
                                    </div>
                            </tr>
                            @php $i++;@endphp
                        @endforeach
                    @else
                        <tr>
                            <td colspan='6'>
                                <h1>No videos to show</h1>
                            </td>
                        </tr>
                    @endif
                </tbody>
            @endif



        </table>
    </div>


    <!-- Modal for the video player -->

    <script>
        var playButton = document.getElementsByClassName("playbtn_video");
        console.log(playButton.length);
        var videoModal = document.getElementsByClassName("open_video");
        var closeModal = document.getElementsByClassName("close_video");
        var videoElement = document.getElementsByTagName("video");

        for (let i = 0; i < playButton.length; i++) {
            // console.log("ok");
            playButton[i].addEventListener("click", function() {
                videoModal[i].style.display = "flex";
            })
        }

        for (let i = 0; i < playButton.length; i++) {
            closeModal[i].addEventListener("click", function() {
                videoElement[i].pause();
                videoModal[i].style.display = "none";

            })
        }
    </script>
@endsection
