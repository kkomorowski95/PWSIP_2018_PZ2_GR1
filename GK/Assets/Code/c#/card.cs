using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class card : MonoBehaviour {

    public GameObject karta;
    public GameObject stol;
    static double unscaledx = 1.04066;
    static double unscaledy = 1.452806;
    static double scaledx = unscaledx * 1.2;
    static double scaledy = unscaledy * 1.2;
    public bool picked = false;
    int order;

    // Use this for initialization
    void Start () {
        SpriteRenderer tmp1 = karta.GetComponent<SpriteRenderer>();
        order = tmp1.sortingLayerID;
    }
	
	// Update is called once per frame
	void Update () {
		
	}

    public void pick()
    {
        SpriteRenderer tmp1 = karta.GetComponent<SpriteRenderer>();
        if (tmp1.enabled)
        {
            stol.GetComponent<match_info>().Upick_All();
            Transform[] tmp = karta.GetComponents<Transform>();
            tmp[0].localScale = new Vector3((float)scaledx, (float)scaledy, 10);
            tmp1.sortingLayerID = 100;
            picked = true;
        }
    }

    public void unpick()
    {
        Transform[] tmp = karta.GetComponents<Transform>();
        tmp[0].localScale = new Vector3((float)unscaledx, (float)unscaledy, 10);
        SpriteRenderer tmp1 = karta.GetComponent<SpriteRenderer>();
        tmp1.sortingLayerID = order;
        picked = false;
    }
    void OnMouseDown()
    {
        if (picked)
        {
            unpick();
        }
        else
        {
            pick();
        }

    }
}
