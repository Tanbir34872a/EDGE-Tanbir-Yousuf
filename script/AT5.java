package script;

import org.openqa.selenium.Alert;
import org.openqa.selenium.By;
import org.openqa.selenium.chrome.ChromeDriver;
import org.openqa.selenium.chrome.ChromeOptions;

public class AT5 {

	public static void main(String[] args) throws InterruptedException {
		System.setProperty("webdriver.chrome.driver", "C:\\Users\\tanbi\\lib\\chromedriver-win64\\chromedriver.exe");
		ChromeOptions option= new ChromeOptions();
		option.addArguments("--remote-allow-origins");
		ChromeDriver driver= new ChromeDriver(option);
		
		driver.get("http://collaborativemanagementsystemsqa.free.nf");
		Thread.sleep(500);
		driver.findElement(By.name("username")).sendKeys("nouroj");
		driver.findElement(By.name("password")).sendKeys("n12"); //obvious wrong password
		driver.findElement(By.xpath("//*[@id=\"loginField\"]/div/input[2]")).click();
		Thread.sleep(500);
		Alert alert = driver.switchTo().alert();
		String actual = alert.getText();
		String expected = "invalid username or password";
				
		
		if (actual.equals(expected)) {
			System.out.print("Success");
		} else {
			System.out.print("Fail");
		}
	}
}

