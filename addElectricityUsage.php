<?php
    $page_title = 'Insert Electricity Usage';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        require ('db_connect_dataretriever.php');

        $errors = array();

  	if (empty($_POST['idBuildings'])) {
            $errors[] = 'Invalid idBuildings';
        } else {
            $idBuildings = mysqli_real_escape_string($dbc, trim($_POST['idBuildings']));
        }

        if (empty($_POST['Usage'])) {
            $errors[] = 'Invalid Amount Usage';
        } else {
            $Usage = mysqli_real_escape_string($dbc, trim($_POST['Usage']));
        }

        if (empty($_POST['Units'])) {
            $errors[] = 'Invalid Units';
        } else {
            $Units = mysqli_real_escape_string($dbc, trim($_POST['PubTitle']));
        }

        if (empty($_POST['Date/Time'])) {
            $errors[] = 'Invalid Date/Time';
        } else {
            $Date/Time = mysqli_real_escape_string($dbc, trim($_POST['Date/Time']));
        }

       
        if (empty($errors)) {
            $insertElectricityUsage = "INSERT INTO ElectricityUsage (idBuildings, Usage, Units, Date/Time) 
            VALUES ('$idBuildings', '$Usage', '$Units', 'Date/Time')";
            $ElectricityUsageInsertion = @mysqli_query($dbc, $insertElectricityUsage);
            if ($ElectricityUsageInsertion) {
		}else{
                echo "Operation Failed" . $insertElectricityUsage;
            }

            # Close database connection.
            mysqli_close($dbc);
            exit();
        }
        else {
            echo '<h1>Error!</h1><p id="err_msg">The following error(s) occurred:<br>';
            foreach ($errors as $msg) {
                echo " - $msg<br>";
            }
            echo 'Please try again.</p>';
            mysqli_close($dbc);
        }
    }
?>

# THIS SOFTWARE IS PROVIDED BY THE AUTHOR AND CONTRIBUTORS ``AS IS'' AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE AUTHOR OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.