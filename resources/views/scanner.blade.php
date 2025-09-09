<x-guest-layout>
    <div class="max-w-xl mx-auto text-center py-16">
        <h2 class="text-2xl font-bold mb-6">Scan Employee QR Code</h2>

        <div id="reader" class="w-full mx-auto rounded-lg shadow-md border border-gray-200"></div>

        <button id="rescanBtn"
            class="hidden mt-6 px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">
            Rescan
        </button>

        <p class="text-gray-500 mt-4">Point your camera at the QR code to verify the employee.</p>
    </div>

    <script src="https://unpkg.com/html5-qrcode"></script>
    <script>
        let scanner;
        let hasScanned = false;

        function onScanSuccess(decodedText, decodedResult) {
            if (!hasScanned) {
                hasScanned = true;
                console.log(`Scanned: ${decodedText}`);

                scanner.clear().then(() => {
                    console.log("Scanner stopped.");
                    document.getElementById("rescanBtn").classList.remove("hidden");

                    // Redirect after short delay
                    setTimeout(() => {
                        window.location.href = decodedText;
                    }, 1000);
                }).catch(err => {
                    console.error("Failed to clear scanner", err);
                    window.location.href = decodedText; // fallback redirect
                });
            }
        }

        function startScanner() {
            hasScanned = false;
            scanner = new Html5QrcodeScanner("reader", {
                fps: 10,
                qrbox: 250
            });
            scanner.render(onScanSuccess);
        }

        // Start scanner initially
        startScanner();

        // Rescan button logic
        document.getElementById("rescanBtn").addEventListener("click", () => {
            document.getElementById("rescanBtn").classList.add("hidden");
            startScanner();
        });
    </script>
</x-guest-layout>
