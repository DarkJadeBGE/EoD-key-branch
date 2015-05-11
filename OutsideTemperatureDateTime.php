<?php

require ('connect_appuser.php');

function pullOutsideTemperatureDate($databaseConnection)
{
   $queryOutsideTemperatureDate = 'SELECT epochDate, Degrees FROM OutsideTemperature WHERE Buildings_idBuildings = 126 order by epochDate DESC;';
   $results = mysqli_query($databaseConnection, $queryOutsideTemperatureDate);
   $OutsideTemperatureDate = array();
   if ($results)
   {      
       while($row = mysqli_fetch_array($results))
       {
           $OutsideTemperatureDate[] = $row['epochDate'];
       }
   }
   return $OutsideTemperatureDate;
}

$pulledOutsideTemperatureDate = pullOutsideTemperatureDate($databaseConnection);
echo json_encode($pulledOutsideTemperatureDate);

# THIS SOFTWARE IS PROVIDED BY THE AUTHOR AND CONTRIBUTORS ``AS IS'' AND ANY EXPRESS OR IMPLIED WARRANTIES, 
# INCLUDING, BUT NOT LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE 
# ARE DISCLAIMED. IN NO EVENT SHALL THE AUTHOR OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL, 
# SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS 
# OR SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON ANY THEORY OF LIABILITY, 
# WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE
#  OF THIS SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.
?>

