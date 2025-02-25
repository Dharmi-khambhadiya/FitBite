const addItemButton = document.getElementById('add-item');
const removeItemButton = document.getElementById('remove-item');
const itemCountElement = document.getElementById('item-count');

let itemCount = 0;

// Function to update the item count
function updateItemCount() {
    itemCountElement.textContent = itemCount;
}

// Event listener for adding an item
addItemButton.addEventListener('click', () => {
    itemCount++;
    updateItemCount();
    removeItemButton.disabled = false; // Enable remove button when there is at least one item
});

// Event listener for removing an item
removeItemButton.addEventListener('click', () => {
    if (itemCount > 0) {
        itemCount--;
        updateItemCount();
    }
    if (itemCount === 0) {
        removeItemButton.disabled = true; // Disable remove button if there are no items
    }
});

// Disable remove button initially (as there are no items)
removeItemButton.disabled = true;
