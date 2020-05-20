//webkitURL is deprecated but nevertheless 
URL = window.URL || window.webkitURL || navigator.getUserMedia || navigator.webkitGetUserMedia || navigator.mozGetUserMedia;
var gumStream;
//stream from getUserMedia() 
var rec;
//Recorder.js object 
var input;
//MediaStreamAudioSourceNode we'll be recording 
// shim for AudioContext when it's not avb. 
var AudioContext = window.AudioContext || window.webkitAudioContext || navigator.getUserMedia || navigator.webkitGetUserMedia || navigator.mozGetUserMedia;
var audioContext = new AudioContext;
//new audio context to help us record 
var recordButton2 = document.getElementById("recordButton2");
var stopButton2 = document.getElementById("stopButton2");
var pauseButton2 = document.getElementById("pauseButton2");
//add events to those 3 buttons 
recordButton2.addEventListener("click", startRecording2);
stopButton2.addEventListener("click", stopRecording2);
pauseButton2.addEventListener("click", pauseRecording2);
function startRecording2() { 
    /* Simple constraints object, for more advanced audio features see

https://addpipe.com/blog/audio-constraints-getusermedia/ */

var constraints = {
    audio: true,
    video: false
} 
/* Disable the record button until we get a success or fail from getUserMedia() */

recordButton2.disabled = true;
stopButton2.disabled = false;
pauseButton2.disabled = false

/* We're using the standard promise based getUserMedia()

https://developer.mozilla.org/en-US/docs/Web/API/MediaDevices/getUserMedia */

navigator.mediaDevices.getUserMedia(constraints).then(function(stream) {
    console.log("getUserMedia() success, stream created, initializing Recorder.js ..."); 
    /* assign to gumStream for later use */
    gumStream = stream;
    /* use the stream */
    input = audioContext.createMediaStreamSource(stream);
    /* Create the Recorder object and configure to record mono sound (1 channel) Recording 2 channels will double the file size */
    rec = new Recorder(input, {
        numChannels: 1
    }) 
    //start the recording process 
    rec.record()
    console.log("Recording started");
}).catch(function(err) {
    //enable the record button if getUserMedia() fails 
    recordButton2.disabled = false;
    stopButton2.disabled = true;
    pauseButton2.disabled = true
});
}

function pauseRecording2() {
    console.log("pauseButton2 clicked rec.recording=", rec.recording);
    if (rec.recording) {
        //pause 
        rec.stop();
        pauseButton2.innerHTML = "Resume";
    } else {
        //resume 
        rec.record()
        pauseButton2.innerHTML = "Pause";
    }
}

function stopRecording2() {
    console.log("stopButton2 clicked");
    //disable the stop button, enable the record too allow for new recordings 
    stopButton2.disabled = true;
    recordButton2.disabled = false;
    pauseButton2.disabled = true;
    //reset button just in case the recording is stopped while paused 
    pauseButton2.innerHTML = "Pause";
    //tell the recorder to stop the recording 
    rec.stop(); //stop microphone access 
    gumStream.getAudioTracks()[0].stop();
    //create the wav blob and pass it on to createDownloadLink 
    rec.exportWAV(createDownloadLink2);
}

function createDownloadLink2(blob) {
    var url = URL.createObjectURL(blob);
    var au = document.createElement('audio');
    
    var li = document.createElement('li');
    var link = document.createElement('a');
    //add controls to the <audio> element 
    au.controls = true;
    au.src = url;

    li.name='audio_data';
    //link the a element to the blob 
    link.href = url;
    link.download = new Date().toISOString() + '.wav';
    link.innerHTML = link.download;
    //add the new audio and a elements to the li element 
    li.appendChild(au);
    li.appendChild(link);
    //add the li element to the ordered list 
    var filename = new Date().toISOString();
    //filename to send to server without extension 
    //upload link 
    var upload = document.createElement('a');
    upload.href = "#";
    upload.innerHTML = "Upload";
    upload.addEventListener("click", function(event) {
        var xhr = new XMLHttpRequest();
        xhr.onload = function(e) {
            if (this.readyState === 4) {
                console.log("Server returned: ",e.target.responseText);
                $('#sentence_audio').val(e.target.responseText);
               
            }
        };
        var fd = new FormData();
        fd.append("audio_data", blob, filename);
        xhr.open("POST", "http://flashcards.vishleshak.io/public/assets/audio/upload.php", true);
        xhr.send(fd);
    })
    li.appendChild(document.createTextNode(" ")) //add a space in between 
    li.appendChild(upload) //add the upload link to li
    
    
    recordingsList2.appendChild(li);
}
