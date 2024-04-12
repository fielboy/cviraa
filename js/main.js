$(document).ready(function() {
    const codeReader = new ZXing.BrowserQRCodeReader();

    // Change the scanner to use the external device
    codeReader.getVideoInputDevices()
        .then(videoInputDevices => {
            if (videoInputDevices.length > 0) {
                // Use the first video input device (assuming it's the scanner device)
                const selectedDeviceId = videoInputDevices[0].deviceId;
                codeReader.decodeFromInputVideoDevice(selectedDeviceId, 'preview')
                    .then(result => {
                        $('#qr-input').val(result.text);
                        document.getElementById('scan-sound').pause();
                        document.getElementById('scan-sound').currentTime = 0;
                        document.getElementById('scan-sound').play();
                        $('#form-container').submit();
                    })
                    .catch(err => {
                        console.error(err);
                        alert('Error scanning QR code');
                    });
            } else {
                alert('No scanners found');
            }
        })
        .catch(err => {
            console.error(err);
            alert('Error getting video input devices');
        });

    // Update current time every second
    function updateTime() {
        $('#current-time').html(new Date().toLocaleTimeString());
        requestAnimationFrame(updateTime);
    }
    updateTime();
});
