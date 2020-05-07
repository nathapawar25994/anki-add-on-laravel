<meta charset="UTF-8">
<title>Simple Recorder.js demo with record, stop and pause</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<div id="controls">
    <button id="recordButton">Record</button>
    <button id="pauseButton" disabled>Pause</button>
    <button id="stopButton" disabled>Stop</button>
</div>
<h3>Recordings</h3>
<ol id="recordingsList"></ol>
<!-- inserting these scripts at the end to be able to use all the elements in the DOM --> 
<script src="https://cdn.rawgit.com/mattdiamond/Recorderjs/08e7abd9/dist/recorder.js"></script>
<!-- <script src="js/app1.js"></script> -->
<script src="{{ asset('js/app1.js') }}"></script>
