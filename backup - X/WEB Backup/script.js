// Get reference to table and cells
const table = document.querySelector("#bingotable2");
if (!table) {
  console.error("Table not found");
  return;
}
const cells = table.querySelectorAll("td");
if (!cells) {
  console.error("Cells not found");
  return;
}

// Get reference to showRecentId and showCounter elements
const insert = document.getElementById("showRecentId");
const lastCalled = document.getElementById("showCounter");

// Initialize counter variable
let counter = 0;

// Add click event listener to each cell
cells.forEach((cell) => {
  cell.addEventListener("click", () => {
    // Get the current cell's background color
    const currentColor = window.getComputedStyle(cell).backgroundColor;

    // If the background color is orange, reset the cell and decrement counter
    if (currentColor === "rgb(255, 165, 0)") {
      cell.style.backgroundColor = "";
      cell.style.color = "";
      counter--;
    } else {
      // Otherwise, set the background color to orange and increment counter
      cell.style.backgroundColor = "orange";
      cell.style.color = "white";
      counter++;
    }

    // Update the lastCalled element with the new counter value
    lastCalled.textContent = counter;

    // Add the cell's id to the showRecentId element
    insert.textContent += ` ${cell.dataset.id}`;
  });
});