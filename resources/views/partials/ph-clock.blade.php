<div id="ph-time" class="text-right font-sans text-gray-700">
    <div class="text-sm">Philippine Standard Time:</div>
    <div id="ph-time-value" class="text-base font-medium"></div>
</div>

<script>
function updatePHTime() {
    const options = {
        timeZone: 'Asia/Manila',
        weekday: 'long',
        year: 'numeric',
        month: 'long',
        day: 'numeric',
        hour: 'numeric',
        minute: '2-digit',
        second: '2-digit',
        hour12: true
    };
    const formatted = new Date().toLocaleString('en-US', options);
    document.getElementById('ph-time-value').textContent = formatted;
}

updatePHTime();
setInterval(updatePHTime, 1000);
</script>