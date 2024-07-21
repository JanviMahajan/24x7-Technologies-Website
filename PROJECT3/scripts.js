document.addEventListener('DOMContentLoaded', function() {
    const features = document.querySelector('.features');
    setTimeout(() => {
      features.classList.add('active');
    }, 500); // Delay for the sliding effect
  });