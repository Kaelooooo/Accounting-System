let totalAmount = document.getElementById("total-amount");
let userAmount = document.getElementById("user-amount");
const checkAmountButton = document.getElementById("check-amount");
const totalAmountButton = document.getElementById("total-amount-button");
const productTitle = document.getElementById("product-title");
const errorMessage = document.getElementById("budget-error");
const productTitleError = document.getElementById("product-title-error");
const productCostError = document.getElementById("product-cost-error");
const amount = document.getElementById("amount");
const expenditureValue = document.getElementById("expenditure-value");
const balanceValue = document.getElementById("balance-amount");
const list = document.getElementById("list");
let tempAmount = 0;

// Helper function to format numbers with commas
function formatNumberWithCommas(number) {
  const parts = number.toString().split(".");
  parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",");
  return parts.join(".");
}

// Set Budget Part
totalAmountButton.addEventListener("click", () => {
  tempAmount = parseFloat(totalAmount.value.replace(/[^0-9.]/g, ''));
  // Empty or negative input
  if (isNaN(tempAmount) || tempAmount < 0) {
    errorMessage.classList.remove("hide");
  } else {
    errorMessage.classList.add("hide");
    // Set Budget
    amount.innerHTML = "&#8369;" + formatNumberWithCommas(tempAmount);
    // Set Balance
    balanceValue.innerHTML = "&#8369;" + formatNumberWithCommas(tempAmount - parseFloat(expenditureValue.innerText.replace(/[^0-9.]/g, '')));
    // Clear Input Box
    totalAmount.value = "";
  }
});

// Function To Disable Edit and Delete Button
const disableButtons = (bool) => {
  let editButtons = document.getElementsByClassName("edit");
  Array.from(editButtons).forEach((element) => {
    element.disabled = bool;
  });
};

// Function To Modify List Elements
const modifyElement = (element, edit = false) => {
  let parentDiv = element.parentElement;
  let currentBalance = parseFloat(balanceValue.innerText.replace(/[^0-9.]/g, ''));
  let currentExpense = parseFloat(expenditureValue.innerText.replace(/[^0-9.]/g, ''));
  let parentAmount = parseFloat(parentDiv.querySelector(".amount").innerText.replace(/[^0-9.]/g, ''));
  if (edit) {
    let parentText = parentDiv.querySelector(".product").innerText;
    productTitle.value = parentText;
    userAmount.value = parentAmount;
    disableButtons(true);
  }
  balanceValue.innerHTML = "&#8369;" + formatNumberWithCommas(currentBalance + parentAmount);
  expenditureValue.innerHTML = "&#8369;" + formatNumberWithCommas(currentExpense - parentAmount);

  // Update total balance variable (tempAmount - total expense)
  const totalExpense = parseFloat(expenditureValue.innerText.replace(/[^0-9.]/g, ''));
  const totalBalance = tempAmount - totalExpense;
  balanceValue.innerHTML = "&#8369;" + formatNumberWithCommas(totalBalance.toFixed(2)); // Fix the decimal precision to 2

  parentDiv.remove();
};

// Function To Create List
const listCreator = (expenseName, expenseValue) => {
  let sublistContent = document.createElement("div");
  sublistContent.classList.add("sublist-content", "flex-space");
  list.appendChild(sublistContent);
  sublistContent.innerHTML = `<p class="product">${expenseName}</p><p class="amount">&#8369;${formatNumberWithCommas(
    expenseValue.replace(/[^0-9.]/g, '')
  )}</p>`;
  let editButton = document.createElement("button");
  editButton.classList.add("fa-solid", "fa-pen-to-square", "edit");
  editButton.style.fontSize = "1.2em";
  editButton.addEventListener("click", () => {
    modifyElement(editButton, true);
  });
  let deleteButton = document.createElement("button");
  deleteButton.classList.add("fa-solid", "fa-trash-can", "delete");
  deleteButton.style.fontSize = "1.2em";
  deleteButton.addEventListener("click", () => {
    modifyElement(deleteButton);
  });
  sublistContent.appendChild(editButton);
  sublistContent.appendChild(deleteButton);
  document.getElementById("list").appendChild(sublistContent);
};

// Function To Add Expenses
checkAmountButton.addEventListener("click", () => {
  // Empty checks
  if (!userAmount.value || !productTitle.value || isNaN(parseFloat(userAmount.value.replace(/[^0-9.]/g, '')))) {
    productTitleError.classList.remove("hide");
    return false;
  }
  // Enable buttons
  disableButtons(false);
  // Expense
  let expenditure = parseFloat(userAmount.value.replace(/[^0-9.]/g, ''));
  // Total expense (existing + new)
  let sum = parseFloat(expenditureValue.innerText.replace(/[^0-9.]/g, '')) + expenditure;
  expenditureValue.innerHTML = "&#8369;" + formatNumberWithCommas(sum);
  // Total balance (budget - total expense)
  const totalBalance = tempAmount - sum;
  balanceValue.innerHTML = "&#8369;" + formatNumberWithCommas(totalBalance);
  // Create list
  listCreator(productTitle.value, userAmount.value);
  // Empty inputs
  productTitle.value = "";
  userAmount.value = "";
});

// Add commas to total-amount and user-amount input fields
totalAmount.addEventListener("input", () => {
  totalAmount.value = formatNumberWithCommas(totalAmount.value.replace(/[^0-9.]/g, ''));
});

userAmount.addEventListener("input", () => {
  userAmount.value = formatNumberWithCommas(userAmount.value.replace(/[^0-9.]/g, ''));
});
