<html>
.stripe
  .stripe_inner WARNING
</html>
<style>
:root {
  --stripe-size: 100px;
  --color1: #c44;
  --color2: #313131;
  --duration: 2s;
}

body {
  display: flex;
  height: 100vh;
  overflow: hidden;
}

.stripe {
  position: relative;
  display: flex;
  justify-content: center;
  align-items: center;
  width: 100%;
  height: 100%;
  
  &_inner {
    position: relative;
    display: flex;
    justify-content: center;
    align-items: center;
    width: 100%;
    height: 100%;
    font-size: 8rem;
    text-align: center;
    font-family: 'Anton', sans-serif;
    color: rgba(#fff, 0);
    background: repeating-linear-gradient(
      45deg,
      var(--color1) 25%,
      var(--color1) 50%,
      var(--color2) 50%,
      var(--color2) 75%
    );
    background-size: var(--stripe-size) var(--stripe-size);
    background-clip: text;
    animation: stripeBackgroundPosition var(--duration) linear infinite;
  }

  &::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: calc(100% + var(--stripe-size));
    height: 100%;
    background: repeating-linear-gradient(
      45deg,
      var(--color2) 25%,
      var(--color2) 50%,
      var(--color1) 50%,
      var(--color1) 75%
    );
    background-size: var(--stripe-size) var(--stripe-size);
    animation: stripeTransform var(--duration) linear infinite;
  }
  
  &::after {
    content: '';
    position: absolute;
    width: 100%;
    height: 100%;
    background: radial-gradient(ellipse at center, rgba(#1b2735, 0) 0%, #090a0f 100%);
  }
}

@keyframes stripeTransform {
  0% {
    transform: translateX(0);
  }
  
  100% {
    transform: translateX(calc(var(--stripe-size) * -1));
  }
}

@keyframes stripeBackgroundPosition {
  0% {
    background-position: 0 0;
  }
  
  100% {
    background-position: calc(var(--stripe-size) * -1) 0;
  }
}
</style>