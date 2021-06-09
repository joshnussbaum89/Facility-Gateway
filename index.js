/***
 * jQuery question #1
 ***/

/**
 * If user clicked a button, alert user that a button was clicked.
 * This works for buttons dynamically added later.
 * @param {object} e Event object
 * @returns Browser alert if user clicked a button.
 */
const alertUserOfButtonClick = (e) =>
  e.target.tagName === 'BUTTON' ? alert('Button Clicked!') : null;

// Event listener to call function
document.addEventListener('click', alertUserOfButtonClick);

/***
 * jQuery question #2
 ***/

/**
 * Creates select element with options that hold values from each key/value pair
 * @param {object} object
 */
const createColorList = () => {
  // Colors JSON
  let colors;

  // Fetch JSON from colors.json file in root directory
  fetch('./colors.json')
    .then((response) => response.json())
    .then((data) => (colors = data))
    .finally(() => {
      // create select element
      const select = document.createElement('select');

      // create an array that holds key/value info
      const colorArray = Object.entries(colors);

      // set id of select element
      select.id = 'colorList';

      // loop through to create options value and text content
      colorArray.forEach((color) => {
        const option = document.createElement('option');
        option.setAttribute('value', `${color[0]}`);
        option.textContent = color[1];
        select.appendChild(option);
      });

      // append select element to DOM
      document.querySelector('body').appendChild(select);
    })
    .catch((error) => console.log('Error parsing data: ', error));
};

// Call function to create select element and populate options with info from JSON
createColorList();

/***
 * jQuery question #3
 ***/

/**
 * Creates an event listener for all divs with a class of 'container'.
 * If the container is clicked, turn the containers background yellow.
 */
const turnContainerYellow = () => {
  // grab all divs with a class of 'container'
  const container = document.querySelectorAll('.container');

  // turn nodelist into an array
  const containerArray = [...container];

  // 1. loop through array of container items
  // 2. add event listener that turns container yellow if clicked
  containerArray.forEach((div) => {
    div.addEventListener('click', () => {
      if (div.style.backgroundColor === 'yellow') {
        div.style.backgroundColor = 'white';
      } else {
        div.style.backgroundColor = 'yellow';
      }
    });
  });
};

// Call function to create event listeners for containers
turnContainerYellow();
