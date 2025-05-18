package com.example.businesscard

import android.os.Bundle
import androidx.activity.ComponentActivity
import androidx.activity.compose.setContent
import androidx.activity.enableEdgeToEdge
import androidx.compose.foundation.layout.fillMaxSize
import androidx.compose.foundation.layout.padding
import androidx.compose.material3.Scaffold
import androidx.compose.material3.Text
import androidx.compose.runtime.Composable
import androidx.compose.ui.Modifier
import androidx.compose.ui.res.painterResource
import androidx.compose.ui.tooling.preview.Preview
import com.example.businesscard.ui.theme.BusinessCardTheme
import androidx.compose.foundation.Image
import androidx.compose.foundation.layout.Arrangement
import androidx.compose.foundation.layout.Row
import androidx.compose.foundation.layout.Column
import androidx.compose.foundation.layout.fillMaxWidth
import androidx.compose.foundation.layout.height
import androidx.compose.foundation.layout.width
import androidx.compose.ui.Alignment
import androidx.compose.ui.text.font.FontStyle
import androidx.compose.material.icons.Icons
import androidx.compose.material.icons.filled.Phone
import androidx.compose.material3.Icon
import androidx.compose.ui.graphics.Color
import androidx.compose.material.icons.filled.Email
import androidx.compose.ui.unit.dp
import androidx.compose.material3.Surface


class MainActivity : ComponentActivity() {
    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        enableEdgeToEdge()
        setContent {
            BusinessCardTheme {
                Scaffold(modifier = Modifier.fillMaxSize()) { innerPadding ->
                    Card()
                }
            }
        }
    }
}

@Composable
fun Card() {
    val img= painterResource(R.drawable.logo)
    val ig=painterResource(R.drawable.ig)
    Surface(color=Color.LightGray) {
        Column(
            modifier = Modifier.fillMaxSize(),
            horizontalAlignment = Alignment.CenterHorizontally,
            verticalArrangement = Arrangement.SpaceEvenly
        ) {
            Column(horizontalAlignment = Alignment.CenterHorizontally) {
                Row {
                    Image(
                        painter = img,
                        contentDescription = "Logo"
                    )
                }

                Row {
                    Text(
                        text = "ASSAMI Aimad",
                        fontStyle = FontStyle.Italic
                    )
                }

                Row {
                    Text(
                        text = "Business",
                        fontStyle = FontStyle.Italic,
                    )
                }
            }

            Column(verticalArrangement = Arrangement.spacedBy(30.dp)) {
                Row(
                    modifier = Modifier.padding(horizontal = 100.dp),
                    horizontalArrangement = Arrangement.spacedBy(20.dp)
                ) {
                    Icon(
                        imageVector = Icons.Filled.Phone,
                        contentDescription = "Phone Icon",
                        tint = Color.Green
                    )

                    Text(
                        text = "+212 000000000"
                    )
                }

                Row(
                    modifier = Modifier.padding(horizontal = 100.dp),
                    horizontalArrangement = Arrangement.spacedBy(20.dp)
                ) {
                    Image(
                        painter = ig,
                        contentDescription = "IG",
                        modifier = Modifier
                            .width(20.dp)
                            .height(20.dp)
                    )

                    Text(
                        text = "@mybusiness"
                    )
                }

                Row(
                    modifier = Modifier.padding(horizontal = 100.dp),
                    horizontalArrangement = Arrangement.spacedBy(20.dp)
                ) {
                    Icon(
                        imageVector = Icons.Filled.Email,
                        contentDescription = "Email Icon",
                        tint = Color.Red
                    )

                    Text(
                        text = "example@gmail.com"
                    )
                }
            }

        }
    }

}