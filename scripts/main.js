
    // JavaScript to control the animation
    document.addEventListener('DOMContentLoaded', function () {
      const textElement = document.querySelector('.typewriter-text');
      const textContent = textElement.textContent;

      // Remove the original text content to replace it with the animated version
      textElement.textContent = '';

      // Split the text into individual characters and append each one with a delay
      textContent.split('').forEach(function (char, index) {
        const charSpan = document.createElement('span');
        charSpan.textContent = char;
        charSpan.style.animationDelay = index * 0.1 + 's';
        textElement.appendChild(charSpan);
      });
      setTimeout(function () {
        textElement.style.borderRight = 'transparent';
      }, 3000); // 3000 milliseconds = 3 seconds (adjust this value based on your typing animation duration)
    });
  