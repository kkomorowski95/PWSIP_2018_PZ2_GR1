using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class ingame : MonoBehaviour {

    private bool gamePaused = false;
    // Use this for initialization
    void Start () {
		
	}
	
	// Update is called once per frame
	void Update () {
        if (Input.GetKeyDown(KeyCode.Escape))
        {
            if (gamePaused)
            {
                Time.timeScale = 1;
                gamePaused = false;
            }
            else
            {
                Time.timeScale = 0;
                gamePaused = true;
            }
        }
    }
void DrawQuad(Rect position, Color color)
    {
        Texture2D texture = new Texture2D(1, 1);
        texture.SetPixel(0, 0, color);
        texture.Apply();
        GUI.skin.box.normal.background = texture;
        GUI.Box(position, GUIContent.none);
    }
    void OnGUI()
    {
        if (gamePaused)
        {
            Color background = Color.black;
            background.a = 0.3f;
            DrawQuad(new Rect(0, 0, Screen.width, Screen.height), background);
            if (GUI.Button(new Rect(Screen.width / 2 - 50, 20, 100, 20), "Graj"))
            {
                Time.timeScale = 1;
                gamePaused = false;
            }
            if (GUI.Button(new Rect(Screen.width / 2 - 50, 50, 100, 20), "Opcje"))
            {
                Application.LoadLevel(3);
            }
            if (GUI.Button(new Rect(Screen.width / 2 - 50, 80, 100, 20), "Poddaj Grę"))
            {
                Application.LoadLevel(1);
            }
        }
    }

}
