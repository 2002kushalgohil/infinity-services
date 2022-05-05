const userDashBoardSearchBx = document.getElementById("userDashBoardSearchBx");
const userSearchChkBx = document.getElementById("userSearchChkBx");
const toastMessage = document.getElementById("toastMessage");

if (userDashBoardSearchBx != null) {
  userDashBoardSearchBx.addEventListener("click", () => {
    userSearchChkBx.checked = !userSearchChkBx.checked;
  });
}
