
package script;

import org.openqa.selenium.By;
import org.openqa.selenium.chrome.ChromeDriver;
import org.openqa.selenium.chrome.ChromeOptions;

public class AT2 {
	public static void main(String[] args) throws InterruptedException {
		System.setProperty("webdriver.chrome.driver", "C:\\Users\\tanbi\\lib\\chromedriver-win64\\chromedriver.exe");
		ChromeOptions option= new ChromeOptions();
		option.addArguments("--remote-allow-origins");
		ChromeDriver driver= new ChromeDriver(option);
		
		driver.get("http://collaborativemanagementsystemsqa.free.nf");
		Thread.sleep(500);
		driver.findElement(By.name("username")).sendKeys("nouroj");
		driver.findElement(By.name("password")).sendKeys("nouroj@12");
		driver.findElement(By.xpath("//*[@id=\"loginField\"]/div/input[2]")).click();
		Thread.sleep(500);
		driver.get("http://collaborativemanagementsystemsqa.free.nf/view/client/profile.php");
		String oldData = driver.findElement(By.xpath("/html/body/div/div/h2[5]")).getText().split("\\s+")[1];
		System.out.println(oldData);
		driver.get("http://collaborativemanagementsystemsqa.free.nf/view/client/updateprofile.php?edit=4");
		Thread.sleep(500);
		String newInput = "Jeddah"; // Change for new input
		driver.findElement(By.name("address")).clear();
		driver.findElement(By.name("address")).sendKeys(newInput);
		driver.findElement(By.name("submit")).click();
		Thread.sleep(500);
		String newData = driver.findElement(By.xpath("/html/body/div/div/h2[5]")).getText().split("\\s+")[1];
		
		if (newData.equals(newInput)) {
			System.out.print("Success");
		} else {
			System.out.print("Fail");
		}
	}

}
