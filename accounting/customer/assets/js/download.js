// Function to generate PDF file for download
function generatePDF() {
  // Retrieve the expense list elements
  const expenseList = document.getElementById("list").children;

  // Create an empty array to hold the list data
  const listData = [];

  // Iterate over each expense list item and extract the data
  for (let i = 0; i < expenseList.length; i++) {
    const expenseItem = expenseList[i];
    const product = expenseItem.querySelector(".product").innerText;
    const amount = expenseItem.querySelector(".amount").innerText.replace(/[^0-9.]/g, ""); // Remove non-numeric characters
    listData.push({ product, amount });
  }

// Get the current date and format it
const currentDate = new Date();
const options = { year: 'numeric', month: 'long', day: 'numeric' };
const formattedDate = currentDate.toLocaleDateString('en-US', options);


  // Get the current time and format it in 12-hour format
  const hours = currentDate.getHours() % 12 || 12;
  const minutes = currentDate.getMinutes().toString().padStart(2, "0");
  const ampm = currentDate.getHours() >= 12 ? "PM" : "AM";
  const formattedTime = `${hours}:${minutes} ${ampm}`;

  // Get the total budget, amount spent, and remaining balance values
  const totalBudget = parseFloat(document.getElementById("amount").innerText.replace(/[^0-9.]/g, ""));
  let amountSpent = 0;
  for (let i = 0; i < listData.length; i++) {
    amountSpent += parseFloat(listData[i].amount);
  }
  const remainingBalance = totalBudget - amountSpent;
// Define the document definition for PDF generation
const docDefinition = {
  footer: {
    columns: [
      { text: '2023 | DACI Accounting', alignment: 'center', fontSize: 10, italics: true }
    ]
  },
  content: [
    { text: 'Budget Summary', style: 'header' },
    { text: `Created: ${formattedDate} at ${formattedTime}`, style: 'subheader' },
    { text: '\n' },
    {
      style: 'summaryTable',
      table: {
        headerRows: 1,
        widths: ['*', '*', '*'],
        body: [
          [
            { text: 'Total Budget', bold: true, alignment: 'center' },
            { text: 'Amount Spent', bold: true, alignment: 'center' },
            { text: 'Remaining Balance', bold: true, alignment: 'center' }
          ],
          [
            { text: '\u20B1' + formatNumberWithCommas(totalBudget.toFixed(2)), alignment: 'center' },
            { text: '\u20B1' + formatNumberWithCommas(amountSpent.toFixed(2)), alignment: 'center' },
            { text: '\u20B1' + formatNumberWithCommas(remainingBalance.toFixed(2)), alignment: 'center' }
          ]
        ]
      }
    },
    { text: '\n' },
    {
      style: 'table',
      table: {
        headerRows: 1,
        widths: ['*', '*'],
        body: [
          [
            { text: 'Name of Expense', bold: true, alignment: 'center' },
            { text: 'Amount', bold: true, alignment: 'center' }
          ],
          ...listData.map((item) => [item.product, { text: '\u20B1' + formatNumberWithCommas(item.amount), alignment: 'center' }])
        ]
      }
    },
    { text: '\n' },
    { text: 'Note: All the listed expenses are from the values provided by the user.', style: 'note' }
  ],
  styles: {
    header: { fontSize: 18, bold: true, alignment: 'center' },
    subheader: { fontSize: 14, bold: true, alignment: 'center', margin: [0, 0, 0, 10] },
    table: { margin: [0, 5, 0, 15] },
    summaryTable: { margin: [0, 10, 0, 15] },
    note: { fontSize: 10, alignment: 'center', italics: true, margin: [0, 10] }
  }
};

  // Generate the PDF
  pdfMake.createPdf(docDefinition).download("Expense Report.pdf");
}

// Attach event listener to the download button
const downloadButton = document.getElementById("download-button");
downloadButton.addEventListener("click", generatePDF);
